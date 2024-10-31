<?php
/**
 * This class is responsible for the agent metadata supply.
 *
 * @since      1.0.0
 * @package    Real_Estate_Agents
 * @subpackage Real_Estate_Agents/includes
 * @author     PearlThemes <hello@pearlthemes.com>
 */
class Pearl_Agent {

	/**
	 * @var int $agent_id contains agent post id.
	 */
	private $agent_id;

	/**
	 * @var array agent meta keys
	 */
	private $meta_keys = array(
		'agent_email'   => "pearl_agent_email",
		'designation'   => "pearl_designation",
		'mobile_number' => "pearl_mobile_number",
	);

	/**
	 * @var array $meta_data contains custom fields data related to a agent
	 */
	private $meta_data;

	/**
	 * @param int $agent_id
	 */
	public function __construct( $agent_id = null ) {

		if ( ! $agent_id ) {
			$agent_id = get_the_ID();
		} else {
			$agent_id = intval( $agent_id );
		}

		if ( $agent_id > 0 ) {
			$this->agent_id = $agent_id;
			$this->meta_data   = get_post_custom( $agent_id );
		}

	}

	/**
	 * Return agent meta
	 *
	 * @param $meta_key
	 *
	 * @return mixed
	 */
	public function get_agent_meta( $meta_key ) {
		if ( isset( $this->meta_data[ $meta_key ] ) ) {
			return $this->meta_data[ $meta_key ][0];
		} else {
			return false;
		}
	}

	/**
	 * Return agent email
	 * @return bool|mixed
	 */
	public function get_agent_email() {
		if ( ! $this->agent_id ) {
			return false;
		}

		return $this->get_agent_meta( $this->meta_keys['agent_email'] );
	}

	/**
	 * Return agent designation
	 * @return bool|mixed
	 */
	public function get_agent_designation() {
		if ( ! $this->agent_id ) {
			return false;
		}

		return $this->get_agent_meta( $this->meta_keys['designation'] );
	}

	/**
	 * Return agent designation
	 * @return bool|mixed
	 */
	public function get_agent_mobile_number() {
		if ( ! $this->agent_id ) {
			return false;
		}

		return $this->get_agent_meta( $this->meta_keys['mobile_number'] );
	}

	/**
	 * Return social profiles
	 *
	 * @return null|string|mixed
	 */
	public function get_agent_social_profiles() {

		if ( ! $this->agent_id ) {
			return false;
		}

		$social_profiles_list = '';

		$social_profiles = array(
			'facebook'    => "pearl_facebook_profile",
			'twitter'     => "pearl_twitter_profile",
			'google-plus' => "pearl_google_plus_profile",
			'linkedin'    => "pearl_linkedin_profile",
			'instagram'   => "pearl_instagram_profile",
			'pinterest'   => "pearl_pinterest_profile",
			'youtube'     => "pearl_youtube_profile",
		);

		foreach ( $social_profiles as $social_network => $social_profile_link ) {

			$social_profiles_link = $this->get_agent_meta( $social_profile_link );

			if ( ! empty( $social_profiles_link ) ) {
				$social_profiles_list .= '<a href="' . $social_profiles_link . '" target="_blank"><i class="fa fa-' . $social_network . '"></i></a>';
			}

		}

		return $social_profiles_list;
	}
}