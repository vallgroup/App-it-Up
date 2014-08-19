<div class="vg-appitup-settings-page relative">
	<h2>App it Up!</h2>

	<form method="post" action="options.php">

		<button type="submit" name="submit" id="submit" class="vg-btn-primary animate5 absolute vg-top-save-btn" value="Save Changes">Save Changes</button>

		<?php settings_fields( 'vg_appitup_options' ); ?>
		<?php do_settings_sections( 'vg_appitup_options' ); ?>

		<div class="field-section">
					
			<h3>General Settings</h3>							
			
			<div class="row">

				<div class="field col2">
					<label for="vg_app_name">Name Your App</label>
					<i>This will be displayed as the default name for the app. The user can change this value when they save your site to their home screen.</i>
					<input type="text" name="vg_app_name" id="vg_app_name" placeholder="App it Up!" value="<?php echo get_option('vg_app_name'); ?>">
				</div>

				<div class="field col2">
					<p class="label">Status Bar Style</p>
					<i>This will change the way the top status bar displays. For example, "black-translucent" makes the status bar slightly transparent.</i>
					<div class="select block relative empty animate5">
						<select name="vg_status_bar" id="vg_status_bar">
							<option value="default" <?php selected(get_option('vg_status_bar'), 'default') ?>>default</option>
							<option value="black" <?php selected(get_option('vg_status_bar'), 'black') ?>>black</option>
							<option value="black-translucent" <?php selected(get_option('vg_status_bar'), 'black-translucent') ?>>black-translucent</option>
						</select>
					</div>	
				</div>

			</div>

		</div>

		<div class="field-section">

			<h3>Upload Your App's Icon</h3>
			<i>Upload the icon that you want users to see when they save your website in their iPhone or iPad. The icon will be displayed just like any other app in the user's device. For best results on all screen resolutions, upload your App icon in all the following sizes. If you do not wish to create four different icons, then the First one (with Highest resolution 144x144) will suffice. But we recommend uploading all four icons to adhere to Apple's guidelines for multiple device support.</i>
			
			<div class="row">

				<div class="field col4">
					<label for="vg_icon_144x144">iPad App Icon (Retina)</label>
					<i>Size: 144 x 144</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_icon_144x144" id="vg_icon_144x144" class="file-url" value="<?php echo get_option('vg_icon_144x144'); ?>">
						<a href="#" data-input="#vg_icon_144x144" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>						
				</div>
				
				<div class="field col4">
					<label for="vg_icon_114x114">iPhone App Icon (Retina)</label>
					<i>Size: 114 x 114</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_icon_114x114" id="vg_icon_114x114" class="file-url" value="<?php echo get_option('vg_icon_114x114'); ?>">
						<a href="#" data-input="#vg_icon_114x114" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>
				
				<div class="field col4">
					<label for="vg_icon_72x72">iPad App Icon</label>
					<i>Size: 72 x 72</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_icon_72x72" id="vg_icon_72x72" class="file-url" value="<?php echo get_option('vg_icon_72x72'); ?>">
						<a href="#" data-input="#vg_icon_72x72" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>
				
				<div class="field col4">
					<label for="vg_icon_57x57">iPhone App Icon</label>
					<i>Size: 57 x 57</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_icon_57x57" id="vg_icon_57x57" class="file-url" value="<?php echo get_option('vg_icon_57x57'); ?>">
						<a href="#" data-input="#vg_icon_57x57" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>
			
			</div>

		</div>

		<div class="field-section">

			<h3>Startup Image (Splash-image)</h3>
			<i>This image will display while your app is loading in the user's device.<br>
			<strong>NOTE:</strong> There has been known issues with startup images not working unless they are exactly the image size specified. Please make sure to check your image sizes before uploading them.</i>

			<div class="row">

				<div class="field col4">
					<label for="vg_startup_image_320x460">iPhone</label>
					<i>Size: 320 x 460</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_startup_image_320x460" id="vg_startup_image_320x460" class="file-url" value="<?php echo get_option('vg_startup_image_320x460'); ?>">
						<a href="#" data-input="#vg_startup_image_320x460" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>

				<div class="field col4">
					<label for="vg_startup_image_640x920">iPhone (Retina)</label>
					<i>Size: 640 x 920</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_startup_image_640x920" id="vg_startup_image_640x920" class="file-url" value="<?php echo get_option('vg_startup_image_640x920'); ?>">
						<a href="#" data-input="#vg_startup_image_640x920" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>
				
				<div class="field col4">
					<label for="vg_startup_image_640x1096">iPhone 5 (Retina)</label>
					<i>Size: 640 x 1096</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_startup_image_640x1096" id="vg_startup_image_640x1096" class="file-url" value="<?php echo get_option('vg_startup_image_640x1096'); ?>">
						<a href="#" data-input="#vg_startup_image_640x1096" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>
				
				<div class="field col4">
					<label for="vg_startup_image_768x1004">iPad (non-Retina) (Portrait)</label>
					<i>Size: 768 x 1004</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_startup_image_768x1004" id="vg_startup_image_768x1004" class="file-url" value="<?php echo get_option('vg_startup_image_768x1004'); ?>">
						<a href="#" data-input="#vg_startup_image_768x1004" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>
				
				<div class="field col4">
					<label for="vg_startup_image_1024x748">iPad (non-Retina) (Landscape)</label>
					<i>Size: 1024 x 748</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_startup_image_1024x748" id="vg_startup_image_1024x748" class="file-url" value="<?php echo get_option('vg_startup_image_1024x748'); ?>">
						<a href="#" data-input="#vg_startup_image_1024x748" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>

				<div class="field col4">
					<label for="vg_startup_image_1536x2008">iPad (Retina) (Portrait)</label>
					<i>Size: 1536 x 2008</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_startup_image_1536x2008" id="vg_startup_image_1536x2008" class="file-url" value="<?php echo get_option('vg_startup_image_1536x2008'); ?>">
						<a href="#" data-input="#vg_startup_image_1536x2008" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>
				
				<div class="field col4">
					<label for="vg_startup_image_2048x1496">iPad (Retina) (Landscape)</label>
					<i>Size: 2048 x 1496</i>
					<div class="file block relative empty animate5">
						<input type="text" name="vg_startup_image_2048x1496" id="vg_startup_image_2048x1496" class="file-url" value="<?php echo get_option('vg_startup_image_2048x1496'); ?>">
						<a href="#" data-input="#vg_startup_image_2048x1496" class="tp-upload-file btn-upload"><i class="fa fa-fw fa-lg fa-upload"></i></a>
						<a href="#" id="tp-remove-file" class="tp-remove-file btn-remove"><i class="fa fa-fw fa-lg fa-eraser"></i></a>
						<div class="file-preview"></div>
					</div>
				</div>

			</div>

		</div>

		<div class="field-section">

			<h3>Advanced Settings</h3>

			<div class="row">

				<div class="field col2">
					<p class="label">Use App-Like Behavior</p>
					<div class="checkbox">
						<input type="checkbox" name="vg_app_behave" id="vg_app_behave" value="1" <?php checked(get_option('vg_app_behave'), '1'); ?> class="vg-toggle-element" data-toggle=".use-jquery">
						<label for="vg_app_behave" class="animate"></label>	
					</div>						
				</div>

				<div class="field col2 use-jquery" style="overflow:hidden;<?php echo get_option('vg_app_behave') ? '' : 'display:none;'; ?>">
					<p class="label">Use jQuery</p>
					<i>If checked jQuery will be used to create the 'app-like' functionality, and jQuery's library will be loaded unless already loaded by Wordpress. If left unchecked, regular old javascript will be used for this functionality.</i>
					<div class="checkbox">
						<input type="checkbox" name="vg_use_jquery" id="vg_use_jquery" value="1" <?php checked(get_option('vg_use_jquery'), '1'); ?>>
						<label for="vg_use_jquery" class="animate"></label>
					</div>
				</div>

			</div>

		</div>

		<div class="submit">
			<button type="submit" name="submit" id="submit" class="vg-btn-primary animate5" value="Save Changes">Save Changes</button>
		</div>
	</form>
	</div>