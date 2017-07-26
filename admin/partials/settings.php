				<tr>
					<th scope="row"><?php _e('Automatic removal:', 'fg-drupal-to-wp'); ?></th>
					<td><input id="automatic_empty" name="automatic_empty" type="checkbox" value="1" <?php checked($data['automatic_empty'], 1); ?> /> <label for="automatic_empty" ><?php _e('Automatically remove all the WordPress content before each import', 'fg-drupal-to-wp'); ?></label></td>
				</tr>
				<tr>
					<th scope="row" colspan="2"><h3><?php _e('Drupal web site parameters', 'fg-drupal-to-wp'); ?></h3></th>
				</tr>
				<tr>
					<th scope="row"><label for="url"><?php _e('URL of the live Drupal web site', 'fg-drupal-to-wp'); ?></label></th>
					<td><input id="url" name="url" type="text" size="50" value="<?php echo $data['url']; ?>" /><br />
						<small><?php _e('This field is used to pull the media off that site. It must contain the URL of the original site.', 'fg-drupal-to-wp'); ?></small>
					</td>
				</tr>
				<tr>
					<th scope="row" colspan="2"><h3><?php _e('Drupal database parameters', 'fg-drupal-to-wp'); ?></h3></th>
				</tr>
				<tr>
					<th scope="row"><label for="hostname"><?php _e('Hostname', 'fg-drupal-to-wp'); ?></label></th>
					<td><input id="hostname" name="hostname" type="text" size="50" value="<?php echo $data['hostname']; ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="port"><?php _e('Port', 'fg-drupal-to-wp'); ?></label></th>
					<td><input id="port" name="port" type="text" size="50" value="<?php echo $data['port']; ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="database"><?php _e('Database', 'fg-drupal-to-wp'); ?></label></th>
					<td><input id="database" name="database" type="text" size="50" value="<?php echo $data['database']; ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="username"><?php _e('Username', 'fg-drupal-to-wp'); ?></label></th>
					<td><input id="username" name="username" type="text" size="50" value="<?php echo $data['username']; ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="password"><?php _e('Password', 'fg-drupal-to-wp'); ?></label></th>
					<td><input id="password" name="password" type="password" size="50" value="<?php echo $data['password']; ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="prefix"><?php _e('Drupal Table Prefix', 'fg-drupal-to-wp'); ?></label></th>
					<td><input id="prefix" name="prefix" type="text" size="50" value="<?php echo $data['prefix']; ?>" /></td>
				</tr>
				<tr>
					<th scope="row">&nbsp;</th>
					<td><?php submit_button( __('Test the database connection', 'fg-drupal-to-wp'), 'secondary', 'test_database' ); ?>
					<span id="database_test_message" class="action_message"></span></td>
				</tr>
