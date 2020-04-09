<?php
/**
 * DisciplineController.php - Main Controller
 *
 * Main Controller Discipline Module
 *
 * @category Controller
 * @package Discipline
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

declare(strict_types=1);

namespace OnePlace\Discipline\Controller;

use Application\Controller\CoreEntityController;
use Application\Model\CoreEntityModel;
use OnePlace\Discipline\Model\Discipline;
use OnePlace\Discipline\Model\DisciplineTable;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;

class DisciplineController extends CoreEntityController {
    /**
     * Discipline Table Object
     *
     * @since 1.0.0
     */
    protected $oTableGateway;

    /**
     * DisciplineController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param DisciplineTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,DisciplineTable $oTableGateway,$oServiceManager) {
        $this->oTableGateway = $oTableGateway;
        $this->sSingleForm = 'discipline-single';
        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);

        if($oTableGateway) {
            # Attach TableGateway to Entity Models
            if(!isset(CoreEntityModel::$aEntityTables[$this->sSingleForm])) {
                CoreEntityModel::$aEntityTables[$this->sSingleForm] = $oTableGateway;
            }
        }
    }

    /**
     * Discipline Index
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function indexAction() {
        # You can just use the default function and customize it via hooks
        # or replace the entire function if you need more customization
        return $this->generateIndexView('discipline');
    }

    /**
     * Discipline Add Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function addAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * discipline-add-before (before show add form)
         * discipline-add-before-save (before save)
         * discipline-add-after-save (after save)
         */
        return $this->generateAddView('discipline');
    }

    /**
     * Discipline Edit Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function editAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * discipline-edit-before (before show edit form)
         * discipline-edit-before-save (before save)
         * discipline-edit-after-save (after save)
         */
        return $this->generateEditView('discipline');
    }

    /**
     * Discipline View Form
     *
     * @since 1.0.0
     * @return ViewModel - View Object with Data from Controller
     */
    public function viewAction() {
        /**
         * You can just use the default function and customize it via hooks
         * or replace the entire function if you need more customization
         *
         * Hooks available:
         *
         * discipline-view-before
         */
        return $this->generateViewView('discipline');
    }
}
