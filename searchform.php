<?php
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input class="searchinput" type="text" name="s" id="s" value="<?php _e('站內搜尋','parentstaipei');?>" onfocus="if (this.value == '<?php _e('站內搜尋','parentstaipei');?>')this.value = '';" onblur="if (this.value == '')this.value = '<?php _e('站內搜尋','parentstaipei');?>';" />
    <input type="submit" class="searchbutton" value="" />
</form>