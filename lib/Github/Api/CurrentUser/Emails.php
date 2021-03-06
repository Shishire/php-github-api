<?php

namespace KnpLabs\Github\Api\CurrentUser;

use KnpLabs\Github\Api\AbstractApi;
use KnpLabs\Github\Exception\InvalidArgumentException;

/**
 * @link   http://developer.github.com/v3/users/emails/
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
class Emails extends AbstractApi
{
    /**
     * List emails for the authenticated user
     * @link http://developer.github.com/v3/users/emails/
     *
     * @return array
     */
    public function all()
    {
        return $this->get('user/emails');
    }

    /**
     * Adds one or more email for the authenticated user
     * @link http://developer.github.com/v3/users/emails/
     *
     * @param  string|array $emails
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function add($emails)
    {
        if (is_string($emails)) {
            $emails = array($emails);
        } elseif (0 === count($emails)) {
            throw new InvalidArgumentException();
        }

        return $this->post('user/emails', $emails);
    }

    /**
     * Removes one or more email for the authenticated user
     * @link http://developer.github.com/v3/users/emails/
     *
     * @param  string|array $emails
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function remove($emails)
    {
        if (is_string($emails)) {
            $emails = array($emails);
        } elseif (0 === count($emails)) {
            throw new InvalidArgumentException();
        }

        return $this->delete('user/emails', $emails);
    }
}
