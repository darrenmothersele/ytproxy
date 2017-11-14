<?php

namespace YtProxy;

use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\EmptyResponse;
use Zend\Diactoros\Response\RedirectResponse;

class GetAudio
{
    public function __invoke(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');
        if (!$this->isValidId($id)) {
            return new EmptyResponse(400);
        }
        $url = $this->execYoutubeDl($id);
        if ($this->isValidUrl($url)) {
            return new RedirectResponse($url);
        }
        return new EmptyResponse(404);
    }

    private function execYoutubeDl($id): string {
        $output = [];
        exec('youtube-dl --skip-download --get-url -f 140 '.$id, $output);
        return isset($output[0]) ? $output[0] : '';
    }

    private function isValidId($id): bool {
        $result = preg_match('/^[-_0-9a-zA-Z]+$/', $id);
        return $result === 1;
    }

    private function isValidUrl($value): bool {
        return filter_var($value, FILTER_VALIDATE_URL);
    }
}
