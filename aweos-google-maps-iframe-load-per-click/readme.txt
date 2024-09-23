=== AWEOS Google Maps iframe load per click ===
Contributors: AWEOS
Tags: DSGVO, Google Maps, Google Maps iframe, GDPR, iframe
Donate link: https://aweos.de
Requires at least: 4.5
Tested up to: 6.6
Requires PHP: 7.0
Stable tag: trunk
License: GPL v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

This Plugin prevents the auto loading from Google Map iframes. It will be loaded after the user permits it.

== Description ==

### Automatic Google Maps iFrame Blocker
 
You would like to use embedded Google Maps on your website, but you have to comply with the guidelines of the GDPR/DSGVO? Maybe you want to speed up your site and let the visitor load the map if it's really necessary? This plugin automatically blocks embedded Google Maps for you.
 
Instead of a map, we'll load a placeholder image to indicate that there is a map where users can interact with. To make this even more clear, we let you configure a text displayed to the visitor.

It's important to block the communication between your visitors and the Google server for several reasons.
* **Performance and loading time:** There are tons of reasons why iFrames are bad for the performance of your site, blocking them on page load should help your site to load faster.
* **Privacy and data protection:** You can get into legal problems if the visitor has not given you his explicit consent to forward his data to any third party service (like Google).

These are the main reasons we developed this plugin, it solves these problems by finding Google maps completely automatically on your site and replacing them with our temporary placeholder that can be activated by the visitor.

##### Automatically Swap Google Maps with an Image Placeholder

* Fully customizable CSS classes for the map placeholder.
* No setup required, no changes on your Google maps and no extra work for you.
* No branding necessary, no links to other websites.

##### Are your visitors protected?

* Informed the user that a connection to Google is being established.
* Google Maps can be blocked by the visitor. This can prevent communication with a Google server.

##### Bug reports and feedback

Your feedback is important to us. If you find bugs or have suggestions write us an E-Mail support@aweos.de

This plugin was developed by the advertising agency AWEOS.
Imprint / Legal information (German): [https://aweos.de/impressum/](https://aweos.de/impressum/)

You are free to use it in any country where you want more privacy for your users.

> THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

== Installation ==

1. Log in to /wp-admin.
1. Visit Plugins -> Add New
1. Search for 'AWEOS Google Maps iframe load per click'
1. Download the plugin.
1. Activate the plugin.
1. Look at your new Google Maps

== Frequently Asked Questions ==

There are no FAQ's at the moment

== Screenshots ==

1. 
1. German
1. English

== Changelog ==
Version 1.9.2
Update Readme

== Upgrade Notice ==

The map placeholder, doesn’t repeat itself anymore. It covers the whole container.
