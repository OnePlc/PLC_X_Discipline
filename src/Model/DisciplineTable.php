<?php
/**
 * DisciplineTable.php - Discipline Table
 *
 * Table Model for Discipline
 *
 * @category Model
 * @package Discipline
 * @author Verein onePlace
 * @copyright (C) 2020 Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Discipline\Model;

use Application\Controller\CoreController;
use Application\Model\CoreEntityTable;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Where;
use Laminas\Paginator\Paginator;
use Laminas\Paginator\Adapter\DbSelect;

class DisciplineTable extends CoreEntityTable {

    /**
     * DisciplineTable constructor.
     *
     * @param TableGateway $tableGateway
     * @since 1.0.0
     */
    public function __construct(TableGateway $tableGateway) {
        parent::__construct($tableGateway);

        # Set Single Form Name
        $this->sSingleForm = 'discipline-single';
    }

    /**
     * Get Discipline Entity
     *
     * @param int $id
     * @param string $sKey
     * @return mixed
     * @since 1.0.0
     */
    public function getSingle($id,$sKey = 'Discipline_ID') {
        # Use core function
        return $this->getSingleEntity($id,$sKey);
    }

    /**
     * Save Discipline Entity
     *
     * @param Discipline $oDiscipline
     * @return int Discipline ID
     * @since 1.0.0
     */
    public function saveSingle(Discipline $oDiscipline) {
        $aDefaultData = [
            'label' => $oDiscipline->label,
        ];

        return $this->saveSingleEntity($oDiscipline,'Discipline_ID',$aDefaultData);
    }

    /**
     * Generate new single Entity
     *
     * @return Discipline
     * @since 1.0.0
     */
    public function generateNew() {
        return new Discipline($this->oTableGateway->getAdapter());
    }
}