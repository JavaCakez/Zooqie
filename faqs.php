<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Frequently Asked Questions | ZOOQIE</title>
        <meta name="description" content="Discover the best up and coming independent clothing brands from around the UK. Shop from skate, surf, snow, urban, vintage and many more styles from many different brands with more being added every day. Zooqie is home to independent clothing brands you won&#39;t find anywhere else all in one place.">
        <?
            //Variable declarations
            $folderLevel = 0;
            $folderString = '';
            $names = array('Home', 'FAQs');
            $links = array('index.php', 'faqs.php');
            $pageHeight = 740;

            include($folderString . 'php/head.php');
        ?>

        <script type="text/javascript">
          $(document).ready(function(){
           $('.accordion h2').click(function(){
              if( $(this).next().is(':hidden') )
              {
              $('.accordion h2').removeClass('active').next().slideUp();
              $(this).addClass('active').next().slideDown();
              }
              return false;
           });
          });
        </script>

        <style type="text/css">
        .accordion { width: 960px;}       /* Accordion Width */
        .accordion div { height: 200px;}  /* Section Height - Change this if you want to add more text to a section */
        </style>
        <style type="text/css">
            .Heading-1-C
            {
                font-family:"Harabara", serif; color:#656565; font-size:24px; line-height:1.50em;
            }
        </style>
    </head>

    <body>
        <div class="pageWrapper">
            <? include($folderString . 'php/header.php'); ?>
            <div class="pageContent" style="height:<?echo $pageHeight;?>px;">
                <? include($folderString . 'php/navBar.php'); ?>

                <div style="position:absolute;left:20px;top:155px;width:960px;height:52px;overflow:hidden;">
                    <h1 class="Wp-Heading-1-P" style="margin-top:0px"><span class="Heading-1-C">Frequently Asked Questions</span></h1>
                </div>
                <div id="frag_15" style="position:absolute;left:20px;top:207px;width:960px;height:388px;">
                    <div class="accordion">

                        <section id="one">
                            <h2><a href="#one">How do I find out the Delivery Information of my order?</a></h2>
                            <div>
                                <p> The Delivery Information will be unique to each independent brand. This information can be found in the 'Delivery' tab in the information box below any item of clothing.</p>
                            </div>
                        </section>
                        <section id="two">
                            <h2><a href="#two">How can I return an item of clothing?</a></h2>
                            <div>
                                <p>Check out the <a href="returns.php">returns page</a>.</p>
                            </div>
                        </section>
                        <section id="three">
                            <h2><a href="#three">How long will items of clothing remain out of stock?</a></h2>
                            <div>
                                <p> The length of time will depend on the independent clothing brand, however, keep tuned to our Facebook and Twitter pages and we'll try our best to keep you updated with when products come back in stock. Alternatively, get in contact with the brand direclty via their brand page.</p>
                            </div>
                        </section>
                        <section id="four">
                            <h2><a href="#four">How often are new brands added to Zooqie?</a></h2>
                            <div>
                                <p>We aim to add new brands as often as possible. Check our <a>Facebook</a> and <a>Twitter</a> pages to keep updated on any news of new brands on Zooqie!</p>
                            </div>
                        </section>

                        <section id="five">
                            <h2><a href="#four">I haven't received my order.</a></h2>
                            <div>
                                <p>Brands are expected to dispatch orders within 10 worknig days of you placing the order. If you still have not receieved your item within this time, please check out our <a href="returns.php">disputes page.</a></p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <? include($folderString . 'php/footer.php'); ?>
        </div>
    </body>
</html>

