<?php

if (!defined('ABSPATH')) exit;

add_action('admin_menu', 'awmp_create_menu');

function awmp_create_menu() {
	add_menu_page(
		'Map Privacy', 
		'Map Privacy',
		'administrator', 
		__FILE__, 
		'awmp_admin_menu' 
	);

	add_action( 'admin_init', 'awmp_register_setting' );
}

function awmp_register_setting() {
	register_setting( 'awmp-opt-group', 'awmp-font-size' );
}

function awmp_admin_menu() {
?>
<div class="wrap">
	<h1>AWEOS Google Maps iframe load per click</h1>
	<form method="post" action="options.php">

	    <?php settings_fields( 'awmp-opt-group' ); ?>
	    <?php do_settings_sections( 'awmp-opt-group' ); ?>

	    <p>This plugin works automatically when it is activated. Every Google Maps iframe which is normally set in the content of a post or page will be swapped with our map placeholder. The Google Map iframe will only be loaded, if the user clicks "Load Map" in our map area.</p>

	    <table class="form-table">
	    	<tr>
	    		<p><b>Options:</b></p>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p>font-size:</p>
	    		</td>
	    		<td>
	    			<input type="text" name="awmp-font-size" value="<?php echo esc_attr( get_option('awmp-font-size') ); ?>" />
	    		</td>
	    	</tr>
	    </table>
	    <h4>Disclosure:</h4>
	    
		<p>THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</p>

	    <?php submit_button(); ?>

	</form>
</div>
<?php } 