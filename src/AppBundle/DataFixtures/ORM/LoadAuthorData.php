<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Author;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadAuthorData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $jsonFile = $this->container->getParameter('kernel.root_dir') . "/../var/data/author.json";
        $json = json_decode(file_get_contents($jsonFile));

        foreach ($json as $value) {
            $deathDate = $value->death_date ? \DateTime::createFromFormat('Y-m-d H:i:s', $value->death_date) : null;
            $author = (new Author())
                ->setFirstName($value->first_name)
                ->setLastName($value->last_name)
                ->setGender($value->gender ? "m" : "f")
                ->setBirthDate(\DateTime::createFromFormat('Y-m-d H:i:s', $value->birth_date))
                ->setDeathDate($deathDate)
            ;
            $manager->persist($author);
        }
        $manager->flush();
    }
}