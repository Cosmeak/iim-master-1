<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\{
    Request,
    JsonResponse,
    Response};
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ApiToken;

class TokenAuthenticator extends AbstractAuthenticator
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports(Request $request): ?bool
    {
        return $request->headers->has('Authorization') && 0 === strpos($request->headers->get('Authorization'), 'Bearer ');
    }

    public function authenticate(Request $request): Passport
    {
        $authorizationHeader = $request->headers->get('Authorization');
        $token = substr($authorizationHeader, 7);

        return new SelfValidatingPassport(new UserBadge($token, function ($token) {
            $apiToken = $this->entityManager->getRepository(ApiToken::class)
                ->findOneByToken($token);

            if (!$apiToken) {
                throw new AuthenticationException('Invalid token');
            }

            return $apiToken->getUser();
        }));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $user = $token->getUser();
        $data = [
            'message' => 'Authentication successful',
            'username' => $user->getUserIdentifier(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return new JsonResponse(['error' => 'Authentication Failed'], Response::HTTP_UNAUTHORIZED);
    }
}
