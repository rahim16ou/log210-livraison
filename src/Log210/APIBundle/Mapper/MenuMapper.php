<?php

namespace Log210\APIBundle\Mapper;


use Log210\APIBundle\Message\Request\MenuRequest;
use Log210\APIBundle\Message\Response\Link;
use Log210\APIBundle\Message\Response\MenuResponse;
use Log210\LivraisonBundle\Entity\Menu;

class MenuMapper {

    /**
     * @param MenuRequest $menuRequest
     * @return Menu
     */
    public static function toMenu(MenuRequest $menuRequest, Menu $menuEntity = null) {
        if (is_null($menuEntity))
            $menuEntity = new Menu();
        $menuEntity->setName($menuRequest->getName());
        return $menuEntity;
    }

    /**
     * @param Menu $menuEntity
     * @return MenuResponse
     */
    public static function toMenuResponse(Menu $menuEntity) {
        $menuResponse = new MenuResponse();
        $menuResponse->setId($menuEntity->getId());
        $menuResponse->setName($menuEntity->getName());
        $links = array();
        array_push($links, new Link('restaurant', '/api/restaurants/' . $menuEntity->getRestaurant()->getId()));
        array_push($links, new Link('plats', '/api/restaurants/' . $menuEntity->getRestaurant()->getId() . '/menus/' .
            $menuEntity->getId() . '/plats'));
        array_push($links, new Link('self', 'api/restaurants/' . $menuEntity->getRestaurant()->getId() . "/menus/" .
            $menuEntity->getId()));
        $menuResponse->setLinks($links);
        return $menuResponse;
    }

}
