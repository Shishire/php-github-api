<?php

namespace KnpLabs\Github\Api\GitData;

use KnpLabs\Github\Api\AbstractApi;
use KnpLabs\Github\Exception\MissingArgumentException;

/**
 * @link   http://developer.github.com/v3/git/commits/
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Commits extends AbstractApi
{
    public function show($username, $repository, $sha)
    {
        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/commits/'.urlencode($sha));
    }

    public function create($username, $repository, array $params)
    {
        if (!isset($params['message'], $params['tree'], $params['parents'])) {
            throw new MissingArgumentException(array('message', 'tree', 'parents'));
        }

        return $this->post('repos/'.urlencode($username).'/'.urlencode($repository).'/git/commits', $params);
    }
}
