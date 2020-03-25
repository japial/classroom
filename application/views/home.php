<?php if($userSchool) {?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <h3 class="text-center"><?= $userSchool->name ?></h3>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-md-12 py-5">
        <script>
            var chat_appid = '54132';
            var chat_auth = 'a476d3bd464bd4cf4ba1a520793e243d';
        </script>
        <?php if ($userData) { ?>
            <script>
                var chat_id = "<?php echo $userData->id; ?>";
                var chat_name = "<?php echo $userData->first_name.' '.$userData->last_name; ?>";
                var chat_link = "<?php echo base_url() . 'home/profile/' . $userData->id; ?>"; //Similarly populate it from session for user's profile link if exists
                var chat_avatar = "<?php echo $userData->image; ?>"; //Similarly populate it from session for user's avatar src if exists
                var chat_role = "<?php echo $userData->id; ?>"; //Similarly populate it from session for user's role if exists
                var chat_friends = '<?php echo json_encode($members); ?>'; //Similarly populate it with user's friends' site user id's eg: 14,16,20,31
            </script>
        <?php } ?>
        <script>
            var chat_height = '600px';
            var chat_width = '100%';

            document.write('<div id="cometchat_embed_synergy_container" style="width:' + chat_width + ';height:' + chat_height + ';max-width:100%;border:1px solid #CCCCCC;border-radius:5px;overflow:hidden;"></div>');

            var chat_js = document.createElement('script');
            chat_js.type = 'text/javascript';
            chat_js.src = 'https://fast.cometondemand.net/' + chat_appid + 'x_xchatx_xcorex_xembedcode.js';

            chat_js.onload = function () {
                var chat_iframe = {};
                chat_iframe.module = "synergy";
                chat_iframe.style = "min-height:" + chat_height + ";min-width:" + chat_width + ";";
                chat_iframe.width = chat_width.replace('px', '');
                chat_iframe.height = chat_height.replace('px', '');
                chat_iframe.src = 'https://' + chat_appid + '.cometondemand.net/cometchat_embedded.php';
                if (typeof (addEmbedIframe) == "function") {
                    addEmbedIframe(chat_iframe);
                }
            }
            var chat_script = document.getElementsByTagName('script')[0];
            chat_script.parentNode.insertBefore(chat_js, chat_script);
        </script>
    </div>
</div>
