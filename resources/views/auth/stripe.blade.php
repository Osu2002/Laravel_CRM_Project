<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <style>
        .panel-heading {
            text-align: center;
        }

        .panel-body {
            padding: 20px;
        }

        .error {
            display: none;
        }

        .has-error {
            border-color: #a94442;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment</h1>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <h3 class="panel-title">Payment Details</h3>
                        <p>You need to pay ${{ $invoice->total }}</p>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form" action="{{ route('stripe.post', $invoice->id) }}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf
                            <div class="form-row row">
                                <div class="col-xs-12 form-group required">
                                    <label class="control-label">Name on Card</label>
                                    <input class="form-control" size="4" type="text" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-xs-12 form-group card required">
                                    <label class="control-label">Card Number</label>
                                    <input autocomplete="off" class="form-control card-number" size="20"
                                        type="text" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-xs-12 col-md-4 form-group cvc required">
                                    <label class="control-label">CVC</label>
                                    <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311"
                                        size="4" type="text" required>
                                </div>
                                <div class="col-xs-12 col-md-4 form-group expiration required">
                                    <label class="control-label">Expiration Month</label>
                                    <input class="form-control card-expiry-month" placeholder="MM" size="2"
                                        type="text" required>
                                </div>
                                <div class="col-xs-12 col-md-4 form-group expiration required">
                                    <label class="control-label">Expiration Year</label>
                                    <input class="form-control card-expiry-year" placeholder="YYYY" size="4"
                                        type="text" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="col-md-12 error form-group">
                                    <div class="alert alert-danger">Please correct the errors and try again.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");

            $('form.require-validation').on('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]',
                        'input[type=file]', 'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;

                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');

                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                // console.log(status);

                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
</body>

</html>
