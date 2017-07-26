				<tr>
					<th scope="row" colspan="2"><h3><?php _e('Behavior', 'fg-drupal-to-wp'); ?></h3></th>
				</tr>
				<tr>
					<th scope="row"><?php _e('Import summary:', 'fg-drupal-to-wp'); ?></th>
					<td>
						<input id="summary_in_excerpt" name="summary" type="radio" value="in_excerpt" <?php checked($data['summary'], 'in_excerpt'); ?> /> <label for="summary_in_excerpt" title="<?php _e("The summary will be imported into the excerpt.", 'fg-drupal-to-wp'); ?>"><?php _e('to the excerpt', 'fg-drupal-to-wp'); ?></label>&nbsp;&nbsp;
						<input id="summary_in_content" name="summary" type="radio" value="in_content" <?php checked($data['summary'], 'in_content'); ?> /> <label for="summary_in_content" title="<?php _e("The summary will be imported into the post content with a «read more» link.", 'fg-drupal-to-wp'); ?>"><?php _e('to the content', 'fg-drupal-to-wp'); ?></label>&nbsp;&nbsp;
						<input id="summary_in_excerpt_and_content" name="summary" type="radio" value="in_excerpt_and_content" <?php checked($data['summary'], 'in_excerpt_and_content'); ?> /> <label for="summary_in_excerpt_and_content" title="<?php _e("The summary will be imported into both the excerpt and the post content.", 'fg-drupal-to-wp'); ?>"><?php _e('to both', 'fg-drupal-to-wp'); ?></label>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e('Media:', 'fg-drupal-to-wp'); ?></th>
					<td><input id="skip_media" name="skip_media" type="checkbox" value="1" <?php checked($data['skip_media'], 1); ?> /> <label for="skip_media" ><?php _e('Skip media', 'fg-drupal-to-wp'); ?></label>
					<br />
					<div id="media_import_box">
						<?php _e('Set featured image from:', 'fg-drupal-to-wp'); ?><br />
						&nbsp;&nbsp;
						<input id="featured_image_featured" name="featured_image" type="radio" value="featured" <?php checked($data['featured_image'], 'featured'); ?> /> <label for="featured_image_featured" title="<?php _e('Use the image field in priority', 'fg-drupal-to-wp'); ?>"><?php _e('image field', 'fg-drupal-to-wp'); ?></label>&nbsp;&nbsp;
						<input id="featured_image_first_image" name="featured_image" type="radio" value="first_image" <?php checked($data['featured_image'], 'first_image'); ?> /> <label for="featured_image_first_image" title="<?php _e('Use the first image from the content', 'fg-drupal-to-wp'); ?>"><?php _e('first content image', 'fg-drupal-to-wp'); ?></label>&nbsp;&nbsp;
						<input id="featured_image_none" name="featured_image" type="radio" value="none" <?php checked($data['featured_image'], 'none'); ?> /> <label for="featured_image_none" title="<?php _e("Don't use featured images", 'fg-drupal-to-wp'); ?>"><?php _e('none', 'fg-drupal-to-wp'); ?></label>
						<br />
						<input id="only_featured_image" name="only_featured_image" type="checkbox" value="1" <?php checked($data['only_featured_image'], 1); ?> /> <label for="only_featured_image"><?php _e("Import only the featured images. Don't import the other images", 'fg-drupal-to-wp'); ?></label>
						<br />
						<input id="remove_first_image" name="remove_first_image" type="checkbox" value="1" <?php checked($data['remove_first_image'], 1); ?> /> <label for="remove_first_image"><?php _e('Remove the first image from the content when it is used as the featured image', 'fg-drupal-to-wp'); ?></label>
						<br />
						<input id="import_external" name="import_external" type="checkbox" value="1" <?php checked($data['import_external'], 1); ?> /> <label for="import_external"><?php _e('Import external media', 'fg-drupal-to-wp'); ?></label>
						<br />
						<input id="import_duplicates" name="import_duplicates" type="checkbox" value="1" <?php checked($data['import_duplicates'], 1); ?> /> <label for="import_duplicates" title="<?php _e('Checked: download the media with their full path in order to import media with identical names.', 'fg-drupal-to-wp'); ?>"><?php _e('Import media with duplicate names', 'fg-drupal-to-wp'); ?></label>
						<br />
						<input id="force_media_import" name="force_media_import" type="checkbox" value="1" <?php checked($data['force_media_import'], 1); ?> /> <label for="force_media_import" title="<?php _e('Checked: download the media even if it has already been imported. Unchecked: Download only media which were not already imported.', 'fg-drupal-to-wp'); ?>" ><?php _e('Force media import. Keep unchecked except if you had previously some media download issues.', 'fg-drupal-to-wp'); ?></label>
						<br />
						<?php _e('Timeout for each media:', 'fg-drupal-to-wp'); ?>&nbsp;
						<input id="timeout" name="timeout" type="text" size="5" value="<?php echo $data['timeout']; ?>" /> <?php _e('seconds', 'fg-drupal-to-wp'); ?>
					</div></td>
				</tr>
