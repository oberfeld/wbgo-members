<?php

namespace AppBundle\Controller;

use AppBundle\Domain\MemberService;
use JMS\DiExtraBundle\Annotation as DI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MembersController extends Controller {

    /**
     * @var MemberService
     */
    private $service;

    /**
     * @DI\InjectParams()
     * @param MemberService $memberService
     */
    public function __construct(MemberService $memberService) {
        $this->service = $memberService;
    }


    /**
     * @Route("/members")
     */
    public function allMembers() {
        return $this->render(
            'members/members.html.twig',
            array('members' => $this->service->getMembers())
        );
    }


}
