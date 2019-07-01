<?php 
$public_folder = get_stylesheet_directory_uri()
?>
<script>
    var Store = {
        public: '<?= $public_folder ?>',
        images: {
            logo: 'logo.svg'
        }
    }
</script>