
<p>Привет, {{$inviteSeller->invite_seller->name}} </p>

<p>Кто-то пригласил вас зарегистрироваться  в шарашкиной конторе "{{$inviteSeller->seller_company->seller_company_name}}".</p>

<a href="{{ route('seller.invite.accept', ['token' =>$inviteSeller->token,'invitee_id'=> $inviteSeller->invite_seller->id]) }}">Жамка сюда</a> для активации!

