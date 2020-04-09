<?php
/**
 * ExportController.php - Discipline Export Controller
 *
 * Main Controller for Discipline Export
 *
 * @category Controller
 * @package Discipline
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Discipline\Controller;

use Application\Controller\CoreController;
use Application\Controller\CoreExportController;
use OnePlace\Discipline\Model\DisciplineTable;
use Laminas\Db\Sql\Where;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\View\Model\ViewModel;


class ExportController extends CoreExportController
{
    /**
     * ApiController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param DisciplineTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,DisciplineTable $oTableGateway,$oServiceManager) {
        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);
    }


    /**
     * Dump Disciplines to excel file
     *
     * @return ViewModel
     * @since 1.0.0
     */
    public function dumpAction() {
        $this->layout('layout/json');

        # Use Default export function
        $aViewData = $this->exportData('Disciplines','discipline');

        # return data to view (popup)
        return new ViewModel($aViewData);
    }
}