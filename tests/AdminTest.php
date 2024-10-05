<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\User;

class AdminTest extends WebTestCase
{
    private $client;
    private $entityManager;
    private $passwordHasher;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->entityManager = $this->client->getContainer()->get('doctrine')->getManager();
        $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($this->entityManager);

        // Purge et recrée la base de données
        $metadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool->dropSchema($metadata);
        $schemaTool->createSchema($metadata);
        
        $this->passwordHasher = $this->client->getContainer()->get('security.password_hasher');
        
        // Créer un utilisateur admin pour les tests
        $adminUser = new User();
        $adminUser->setEmail('admin3@example.com');
        $adminUser->setPassword($this->passwordHasher->hashPassword($adminUser, 'password123'));
        $adminUser->setRoles(['ROLE_ADMIN']);
        

        // Persist l'utilisateur
        $this->entityManager->persist($adminUser);
        $this->entityManager->flush();
    }

    public function testAdminLogin(): void
    {
        // Simuler la connexion de l'utilisateur admin
        $this->client->loginUser($this->entityManager->getRepository(User::class)->findOneBy(['email' => 'admin3@example.com']));

        // Accéder à la page admin
        $this->client->request('GET', '/admin');
        
        // Vérifiez que l'utilisateur est redirigé vers la page admin
        $this->assertResponseIsSuccessful();

        

        
        
        
    }

    
}

// Run the test with the following command: php bin/phpunit tests/AdminTest.php