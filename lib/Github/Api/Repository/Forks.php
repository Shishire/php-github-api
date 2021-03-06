<?php

namespace KnpLabs\Github\Api\Repository;

use KnpLabs\Github\Api\AbstractApi;

/**
 * @link   http://developer.github.com/v3/repos/forks/
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Forks extends AbstractApi
{
    public function all($username, $repository, array $params = array())
    {
        if (isset($params['sort']) && !in_array($params['sort'], array('newest', 'oldest', 'watchers'))) {
            $params['sort'] = 'newest';
        }

        return $this->get('repos/'.urlencode($username).'/'.urlencode($repository).'/forks', array_merge(array('page' => 1), $params));
    }

    public function create($username, $repository, array $params = array())
    {
        return $this->post('repos/'.urlencode($username).'/'.urlencode($repository).'/forks', $params);
    }
}
