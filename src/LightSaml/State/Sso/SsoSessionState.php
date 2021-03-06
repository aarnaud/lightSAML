<?php

/*
 * This file is part of the LightSAML-Core package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\State\Sso;

class SsoSessionState implements \Serializable
{
    /** @var  string */
    protected $idpEntityId;

    /** @var  string */
    protected $spEntityId;

    /** @var  string */
    protected $nameId;

    /** @var  string */
    protected $nameIdFormat;

    /** @var  string */
    protected $sessionIndex;

    /** @var  \DateTime */
    protected $sessionInstant;

    /** @var  \DateTime */
    protected $firstAuthOn;

    /** @var  \DateTime */
    protected $lastAuthOn;

    /** @var  array */
    protected $options = [];

    /**
     * @return string
     */
    public function getIdpEntityId()
    {
        return $this->idpEntityId;
    }

    /**
     * @param string $idpEntityId
     *
     * @return SsoSessionState
     */
    public function setIdpEntityId($idpEntityId)
    {
        $this->idpEntityId = $idpEntityId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpEntityId()
    {
        return $this->spEntityId;
    }

    /**
     * @param string $spEntityId
     *
     * @return SsoSessionState
     */
    public function setSpEntityId($spEntityId)
    {
        $this->spEntityId = $spEntityId;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameId()
    {
        return $this->nameId;
    }

    /**
     * @param string $nameId
     *
     * @return SsoSessionState
     */
    public function setNameId($nameId)
    {
        $this->nameId = $nameId;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameIdFormat()
    {
        return $this->nameIdFormat;
    }

    /**
     * @param string $nameIdFormat
     *
     * @return SsoSessionState
     */
    public function setNameIdFormat($nameIdFormat)
    {
        $this->nameIdFormat = $nameIdFormat;

        return $this;
    }

    /**
     * @return string
     */
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }

    /**
     * @param string $sessionIndex
     *
     * @return SsoSessionState
     */
    public function setSessionIndex($sessionIndex)
    {
        $this->sessionIndex = $sessionIndex;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFirstAuthOn()
    {
        return $this->firstAuthOn;
    }

    /**
     * @param \DateTime $firstAuthOn
     *
     * @return SsoSessionState
     */
    public function setFirstAuthOn($firstAuthOn)
    {
        $this->firstAuthOn = $firstAuthOn;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastAuthOn()
    {
        return $this->lastAuthOn;
    }

    /**
     * @param \DateTime $lastAuthOn
     *
     * @return SsoSessionState
     */
    public function setLastAuthOn($lastAuthOn)
    {
        $this->lastAuthOn = $lastAuthOn;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSessionInstant()
    {
        return $this->sessionInstant;
    }

    /**
     * @param \DateTime $sessionInstant
     *
     * @return SsoSessionState
     */
    public function setSessionInstant($sessionInstant)
    {
        $this->sessionInstant = $sessionInstant;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return SsoSessionState
     */
    public function addOption($name, $value)
    {
        $this->options[$name] = $value;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return SsoSessionState
     */
    public function removeOption($name)
    {
        unset($this->options[$name]);

        return $this;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasOption($name)
    {
        return isset($this->options[$name]);
    }

    /**
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize(array(
            $this->idpEntityId,
            $this->spEntityId,
            $this->nameId,
            $this->nameIdFormat,
            $this->sessionIndex,
            $this->sessionInstant,
            $this->firstAuthOn,
            $this->lastAuthOn,
            $this->options,
        ));
    }

    /**
     * @param string $serialized
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        // add a few extra elements in the array to ensure that we have enough keys when unserializing
        // older data which does not include all properties.
        $data = array_merge($data, array_fill(0, 5, null));

        list(
            $this->idpEntityId,
            $this->spEntityId,
            $this->nameId,
            $this->nameIdFormat,
            $this->sessionIndex,
            $this->sessionInstant,
            $this->firstAuthOn,
            $this->lastAuthOn,
            $this->options
        ) = $data;
    }
}
