<?php

namespace App\Repository;

use App\Dtos\CreatePostDto;
use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function save($data)
    {
        $post = new Post();

        $post->setTitle($data->title);
        $post->setDescription($data->description);

        $this->getEntityManager()->persist($post);
        $this->getEntityManager()->flush();
    }

    public function findLatest(): array
    {
        return $this->createQueryBuilder('p')
                    ->orderBy('p.createdAt', 'DESC')
                    ->getQuery()
                    ->getResult();
    }

    public function remove(Post $post): void
    {
        $this->getEntityManager()->remove($post);
        $this->getEntityManager()->flush();
    }

    public function update(Post $post, CreatePostDto $data): Post
    {
        $post->setTitle($data->title);
        $post->setDescription($data->description);

        $this->getEntityManager()->flush();

        return $post;

    }

    //    /**
    //     * @return Post[] Returns an array of Post objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Post
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
