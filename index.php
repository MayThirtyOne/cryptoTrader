<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Algo-Trading Bot V1.0</title>
    <meta name="description" content="Algo-Trading Bot To Test Out Your Strategies">
    <meta name="author" content="MayThirtyOne">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css'>
    <link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css'>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="smart-wrap">
        <div class="smart-forms smart-container wrap-2">
            <div class="form-header header-primary" style="float:centre">
                <centre>
                    <h4><i class="fa fa-moon-o"></i>Algo Trading Bot </h4>
                    <!-- <img src = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Telegram_logo.svg/600px-Telegram_logo.svg.png" style="width:50px;height:50px; float:right"> -->
                </centre>
            </div><!-- end .form-header section -->
            <form method="post" id="new_post" name="new_post" action="submit.php" class="wpcf7-form"
                enctype="mu ltipart/form-data">
                <div class="form-body">
                    <div class="spacer-b30">
                        <div class="tagline"><span>Bot Preamble</span></div><!-- .tagline -->
                    </div>



                    <div class="section">
                        <p class="small-text fine-grey"><b>1. Bot Name:</b> Should be without spaces. This acts as
                            identifier for alerts in TG channel. Example: myLovleyBot </p>
                        <p class="small-text fine-grey"><b>2. Coin/Token Symbol :</b> Name of the COIN/TOKEN. Example:
                            BTC, ETH etc.</p>
                        <p class="small-text fine-grey"><b>3. Initial Investment:</b> Investment amount in INR. Example:
                            10000 </p>
                        <p class="small-text fine-grey"><b>4. Trading Fees:</b> Maker/Taker fees in decimal. Example:
                            0.00075 </p>
                        <p class="small-text fine-grey"><b>5. Buy Timeout:</b> Time in seconds after which the bot
                            restarts if no DROP was seen. Example: 180 - This means, if the bot doesn't see a price drop
                            in the next 180 seconds to buy the coin, it will re-start without making any trades.</p>
                        <p class="small-text fine-grey"><b>6. Sell Timeout:</b> Time in seconds after which the bot
                            sells current holdings at current market price if no HIKE was seen. Example: 3600 - This
                            means, the bot will sell current holdings at current market price if there was no HIKE in
                            3600 seconds. </p>
                        <p class="small-text fine-grey"><b>7. Buy If Less Than:</b> Amount in INR. Example: 100 - This
                            means, the bot will place a buy order, if the price went below 100 INR.</p>
                        <p class="small-text fine-grey"><b>8. Sell If Greater Than:</b> Amount in INR. Example 5000 -
                            This means that the bot will place a sell order, if the price went above 5000</p>
                        <p class="small-text fine-grey"><b>9. Maximum Trades:</b>Total trades to perform. Minimum Value
                            : 2. Example: 25 - Bot will terminate after 25 successful trades. Please keep this number
                            low, to avoid excess server load. </p>
                        <br />

                        <div class="spacer-b30">
                            <div class="tagline"><span>Bot Configuration</span></div><!-- .tagline -->
                        </div>


                    </div><!-- end section -->



                    <div class="section">
                        <label for="botName" class="field prepend-icon">
                            <input type="text" name="botName" id="botName" class="gui-input" required
                                placeholder="Bot Name Without Spaces">
                            <label for="botName" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->



                    <div class="section">
                        <label for="coinSymbol" class="field prepend-icon">
                            <input type="text" name="coinSymbol" id="coinSymbol" class="gui-input" required
                                placeholder="Coin/Token Symbol">
                            <label for="coinSymbol" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->



                    <div class="section">
                        <label for="investment" class="field prepend-icon">
                            <input type="number" step=".000000000001" name="investment" id="investment"
                                class="gui-input" required placeholder="Initial Investment Amount">
                            <label for="investment" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <label for="tradingFees" class="field prepend-icon">
                            <input type="number" step=".000000000001" name="tradingFees" id="tradingFees"
                                class="gui-input" required placeholder="Trading Fees ">
                            <label for="tradingFees" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <label for="buyTimeOut" class="field prepend-icon">
                            <input type="number" step=".000000000001" name="buyTimeOut" id="buyTimeOut"
                                class="gui-input" required placeholder="Buy Timeout">
                            <label for="buyTimeOut" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <label for="sellTimeOut" class="field prepend-icon">
                            <input type="number" step=".000000000001" name="sellTimeOut" id="sellTimeOut"
                                class="gui-input" required placeholder="Sell Timeout">
                            <label for="sellTimeOut" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->






                    <div class="section">
                        <label for="buyIfLessThan" class="field prepend-icon">
                            <input type="number" step=".000000000001" name="buyIfLessThan" id="buyIfLessThan"
                                class="gui-input" required placeholder="Buy If Less Than Amount">
                            <label for="buyIfLessThan" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->

                    <div class="section">
                        <label for="sellifGreaterThan" class="field prepend-icon">
                            <input type="number" step=".000000000001" name="sellifGreaterThan" id="sellifGreaterThan"
                                class="gui-input" required placeholder="Sell If Greater Than Amount">
                            <label for="sellifGreaterThan" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->





                    <div class="section">
                        <label for="maxTrades" class="field prepend-icon">
                            <input type="number" step=".000000000001" name="maxTrades" id="maxTrades" class="gui-input"
                                required placeholder="Maximum Trades">
                            <label for="maxTrades" class="field-icon"><i class="fa fa-keyboard-o"></i></label>
                        </label>
                    </div><!-- end section -->







                </div><!-- end .form-body section -->
                <div class="form-footer">
                    <button type="submit" class="button btn-primary" style="width: 100%"> Start Bot </button>
                </div><!-- end .form-footer section -->
            </form>



        </div><!-- end .smart-forms section -->



    </div><!-- end .smart-wrap section -->
    <!-- partial -->



</body>

</html>