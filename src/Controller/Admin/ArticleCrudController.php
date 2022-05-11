<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('title'),
            TextEditorField::new('content'),
            ImageField::new('image', 'Image')
            ->setRequired(false)
            ->setBasePath("asset/images/")
            ->setUploadDir('public/asset/images/')
            ->setUploadedFileNamePattern('[uuid].[extension]'),
            AssociationField::new('Category')
            ->setRequired(true),
            AssociationField::new('User')
        ];
    } 
}
