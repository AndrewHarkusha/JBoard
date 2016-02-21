<?php

namespace App\JoboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\JoboardBundle\Utils\Joboard as Joboard;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs;

    private $activeJobs;

    private $moreJobs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $affiliates;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->affiliates = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add jobs
     *
     * @param \App\JoboardBundle\Entity\Job $jobs
     * @return Category
     */
    public function addJob(\App\JoboardBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \App\JoboardBundle\Entity\Job $jobs
     */
    public function removeJob(\App\JoboardBundle\Entity\Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Get active jobs
     *
     * @param $jobs
     * @return \Doctrine\Common\Collections\Collection
     */
    public function setActiveJobs($jobs)
    {
        $this->activeJobs = $jobs;
    }

    /**
     * Set active jobs
     *
     * @return mixed
     */

    public function getActiveJobs()
    {
        return $this->activeJobs;
    }

    /**
     * Add affiliates
     *
     * @param \App\JoboardBundle\Entity\Affiliate $affiliates
     * @return Category
     */
    public function addAffiliate(\App\JoboardBundle\Entity\Affiliate $affiliates)
    {
        $this->affiliates[] = $affiliates;

        return $this;
    }

    /**
     * Remove affiliates
     *
     * @param \App\JoboardBundle\Entity\Affiliate $affiliates
     */
    public function removeAffiliate(\App\JoboardBundle\Entity\Affiliate $affiliates)
    {
        $this->affiliates->removeElement($affiliates);
    }

    /**
     * Get affiliates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAffiliates()
    {
        return $this->affiliates;
    }

    public function __toString()
    {
        return $this->getName() ? $this->getName() : "";
    }

    /**
     * Set more jobs
     *
     * @param $jobs
     */

    public function setMoreJobs($jobs)
    {
        $this->moreJobs = $jobs >=  0 ? $jobs : 0;
    }

    /**
     * Get more jobs
     *
     * @return mixed
     */

    public function getMoreJobs()
    {
        return $this->moreJobs;
    }

    /**
     * @var string
     */
    private $slug;


    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlugValue()
    {
        $this->slug = Joboard::slugify($this->getName());
    }


    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
