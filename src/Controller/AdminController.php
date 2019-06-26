<?php
/**
 * Created by PhpStorm.
 * User: Svi
 * Date: 26.6.2019.
 * Time: 14:24
 */
namespace App\Controller;
use App\Entity\TUser;
use Doctrine\Common\Persistence\ObjectManager;
use Omines\DataTablesBundle\DataTable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use TestBundle\FooBundle\Controller\DefaultController;
use Omines\DataTablesBundle\DataTableFactory;



class AdminController extends AbstractController
{
    use DataTablesTrait;
    /**
     * @Route("/admin", name="app_admin")
     */
    public function admin(Request $request)
    {
        $table = $this->createDataTable()
            ->add('username', TextColumn::class, ['label' => 'Username', 'className' => 'bold'])
            ->add('ipAdress', TextColumn::class, ['label' => 'IP address', 'className' => 'bold'])
            ->add('viewsCount', TextColumn::class, ['label' => 'Page views count', 'className' => 'bold'])
            ->add('browser', TextColumn::class, ['label' => 'Browser used', 'className' => 'bold'])
            ->add('os', TextColumn::class, ['label' => 'Operating system', 'className' => 'bold'])
            ->add('location', TextColumn::class, ['label' => 'Location', 'className' => 'bold'])
            ->add('timeSpentOnPage', TextColumn::class, ['label' => 'Time Spent on Page', 'className' => 'bold'])
            ->createAdapter(ORMAdapter::class, [
                'entity' => TUser::class,
            ]) ->handleRequest($request);
        if ($table->isCallback()) {
            return $table->getResponse();
        }

        return $this->render('admin.html.twig', ['datatable' => $table]);
    }

    private $factory;

    public function __construct(
        DataTableFactory $factory
    ) {
        $this->factory = $factory;
    }

    /**
     * Creates and returns a basic DataTable instance.
     *
     * @param array $options Options to be passed
     * @return DataTable
     */
    protected function createDataTable(array $options = [])
    {
        return $this->factory->create($options);
    }

    /**
     * Creates and returns a DataTable based upon a registered DataTableType or an FQCN.
     *
     * @param string $type FQCN or service name
     * @param array $typeOptions Type-specific options to be considered
     * @param array $options Options to be passed
     * @return DataTable
     */
    protected function createDataTableFromType($type, array $typeOptions = [], array $options = [])
    {
        return $this->factory->createFromType($type, $typeOptions, $options);
    }

}