<?php
/**
 * Created by PhpStorm.
 * User: emanuel
 * Date: 03.05.16
 * Time: 21:04
 */

namespace AppBundle\Domain;

use AppBundle\Repository\MemberRepository;
use JMS\DiExtraBundle\Annotation as DI;
use JMS\DiExtraBundle\Annotation\Service;

/**
 * @Service("member_service", public=true)
 */
class MemberService {

    /**
     * @var MemberRepository
     */
    private $memberRepository;

    /**
     * @DI\InjectParams()
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository) {
        $this->memberRepository = $memberRepository;
    }
    
    public function getMembers(){
        return $this->memberRepository->findAll();
    }
}