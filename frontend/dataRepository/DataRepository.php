<?php
namespace frontend\dataRepository;

use yii\db\Query;
use yii\helpers\ArrayHelper;

class DataRepository
{
    public function getMonths()
    {
        $months = (new Query())
            ->select('month')
            ->from('monthType')
            ->all();
        return ArrayHelper::map($months, 'month', 'month');
    }

    public function getTonnages()
    {
        $tonnages = (new Query())
            ->select('tonnage')
            ->from('tonnageType')
            ->all();
        return ArrayHelper::map($tonnages,'tonnage','tonnage');
    }

    public function getRaws()
    {
        $raws = (new Query())
        ->select('rawtype')
        ->from('rawTypes')
        ->all();
        return ArrayHelper::map($raws,'rawtype','rawtype');
    } 
    
    public function getCalculateList($rawType){

        $priceList =(new Query())
        ->select(['price', 'tonnage', 'month'])
        ->from('priceList')
        ->leftJoin('monthType', 'priceList.monthTypeId = monthType.id')
        ->leftJoin('tonnageType', 'priceList.tonnageTypeId = tonnageType.id')
        ->leftJoin('rawTypes', 'priceList.rawTypeId = rawTypes.id')
        ->where(['rawTypes.rawtype' => $rawType])
        ->all();

        $prices = [];
        foreach ($priceList as $col) {
            $month = $col['month'];
            $tonnage = $col['tonnage'];
            $price = $col['price'];
            
            $prices[$month][$tonnage] = $price;
        }

        if (!empty($priceList)) {
            return $prices;
        } else {
            return null; 
        }

    }  

    public function getPrice($rawType,$monthType,$tonnageType){

        $priceList =(new Query())
        ->select(['price','tonnage','month'])
        ->from('priceList')
        ->leftJoin('monthType', 'priceList.monthTypeId = monthType.id')
        ->leftJoin('tonnageType', 'priceList.tonnageTypeId = tonnageType.id')
        ->leftJoin('rawTypes', 'priceList.rawTypeId = rawTypes.id')
        ->where([
            'rawTypes.rawtype' => $rawType,
            'monthType.month'=>$monthType,
            'tonnageType.tonnage'=>$tonnageType
            ])
        ->all();
        
        if (!empty($priceList)) {
            return $priceList[0]['price'];
        } else {
            return null; 
        }
    }

 


}
