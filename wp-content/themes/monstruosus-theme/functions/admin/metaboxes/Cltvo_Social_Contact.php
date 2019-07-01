<?php

class Cltvo_Social_Contact extends Cltvo_Metabox_Master
{
    protected $description_metabox = "Social networks";
    protected $post_type = "page";

    protected static $redesConUrl = [
        'facebook' => 'Facebook:',
        'instagram' => 'Instagram:'
    ];

    protected static $redesSinUrl = [];

	public static function metaboxDisplayRule() {
		return isSpecialPage("contact");
	}

    public static function setMetaValue($meta) {

        $meta = is_array($meta) ? $meta : [] ;

        foreach (self::$redesSinUrl as $network => $imagen) {
			$meta[$network] = isset($meta[$network]) ? $meta[$network] :  '';
		}

		foreach (self::$redesConUrl as $network => $imagen) {
			$meta[$network] = isset($meta[$network]) ? $meta[$network] : '';
		}

        return $meta;
    }

	public function CltvoDisplayMetabox( $object ) { ?>

		<table style="width: 100%;">
			<?php foreach (self::$redesConUrl as $slug => $nombre): ?>
				<tr>
					<td style="width: 1px;"><?= $nombre; ?></td>
					<td><?php $this->social_network_link($slug); ?></td>
				</tr>
			<?php endforeach; ?>
		</table>

    <?php }

    private function social_network_link($slug) { ?>
        <p>
            <input type="url"
                placeholder="<?= 'http://' . $slug . '.com' ?>"
                name="<?= $this->meta_key . '[' . $slug . ']' ?>"
                id="<?= $this->meta_key . '_' . $slug; ?>"
                value="<?= $this->meta_value[$slug]; ?>"
                style="width: 100%;" 
            />
        </p>
    <?php }
}
