<?php
/*
 * Copyright (c) 2012, TATRC and Tribal
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * * Redistributions of source code must retain the above copyright
 *   notice, this list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright
 *   notice, this list of conditions and the following disclaimer in the
 *   documentation and/or other materials provided with the distribution.
 * * Neither the name of TATRC or TRIBAL nor the
 *   names of its contributors may be used to endorse or promote products
 *   derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL TATRC OR TRIBAL BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
namespace Core\Library\EntityBundle\Services;

use Doctrine\ORM\EntityManager;

class EntityLibrary
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Given an entity name (alias) it returns the repository of that entity
     *
     * @param $entityName The entity name
     * @return \Doctrine\ORM\EntityRepository The entity repository
     */
    public function get($entityName)
    {
        return $this->entityManager->getRepository('CoreLibraryEntityBundle:' . $entityName);
    }

    /**
     * Get the default entity manager
     *
     * @return \Doctrine\ORM\EntityManager The default entity manager
     */
    public function getManager()
    {
        return $this->entityManager;
    }

    /**
     * Given an entity name (alias) it returns a new instance of that entity
     *
     * @param $entityName The entity name
     * @return mixed A new object of provided entity class
     */
    public function getNew($entityName)
    {
        $entityNamespace = 'Core\\Library\\EntityBundle\\Entity\\' . $entityName;
        return new $entityNamespace;
    }

    /**
     * Given an entity name (alias) it returns the form type of that entity
     *
     * @param $entityName The entity name
     * @return mixed The form type of that entity
     */
    public function getType($entityName)
    {
        $typeNamespace = 'Core\\Library\\EntityBundle\\Form\\Type\\' . $entityName . 'Type';
        return new $typeNamespace;
    }
}