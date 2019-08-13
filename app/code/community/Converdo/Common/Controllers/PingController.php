<?php

namespace Converdo\Common\Controllers;

use Converdo\Common\Response\JsonResponse;
use Converdo\Common\Support\UsesInput;
use Converdo\Common\API\Requests;

class PingController extends JsonResponse
{
    use UsesInput;

    /**
     * Returns information about the plugin and website.
     * 
     * @return string
     */
    public function ping()
    {
        $output['plugin'] = $this->version();

        $encryption = cvd_config()->platform()->encryption();

        if ($this->input()->get('key') === $encryption) {
            $output['validation'] = $this->validation();

            if ($this->input()->has('log')) {
                $output['log'] = $this->log();
            }
        }

        return $this->json($output);
    }

    /**
     * Returns the plugin version section.
     *
     * @return array
     */
    protected function version()
    {
        return [
            'version' => cvd_config()->platform()->version(),
        ];
    }

    /**
     * Returns the last lines of the log file.
     *
     * @return array
     */
    protected function log()
    {
        $log = cvd_logger()->tail($this->input()->get('log'));

        return [
            array_filter($log),
        ];
    }

    /**
     * Returns the validation section.
     *
     * @return array|null
     */
    protected function validation()
    {
        $website = cvd_config()->platform()->website();
        $user = cvd_config()->platform()->user();

        $api = Requests::configuration();
        $api = json_decode($api, true)[0];

        $tokens = json_decode(cvd_config()->crypt()->decrypt($api['tokens']), true);

        $validSite = $tokens['site'] === $website;
        $validUser = in_array($user, $tokens['user']);
        $validEncryption = $tokens['encryption'] === cvd_config()->platform()->encryption();

        return [
            'enabled' => cvd_config()->platform()->enabled(),
            'valid' => $validSite && $validUser && $validEncryption,
            'tokens' => [
                'site' => $validSite,
                'user' => $validUser,
                'encryption' => $validEncryption,
            ]
        ];
    }
}