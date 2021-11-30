<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use Symfony\Component\Validator\Constraints\Date;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CurrencyField;
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
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('introduction'),
            TextField::new('duree'),
            DateField::new('depart'),
            DateField::new('retour'),
            TextField::new('mois'),
            TextEditorField::new('content'),
            TextEditorField::new('presentation'),
            IntegerField::new('price'),
            ImageField::new('image')
                        ->setBasePath('assets\blog\images')
                        ->setUploadDir('public\assets\blog\images')
                        ->setUploadedFileNamePattern('[randomhash].[extension]')
                        ->setRequired(false),
            AssociationField::new("category"),
            AssociationField::new("author"),
        ];
    }
    
}
