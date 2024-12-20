
<x-dashboard.user_files :array="$user->files_user_cert_mediator" title="Общий курс медиатора:" field="user_cert_mediator"   free="{{ count($user->files_user_cert_mediator) }}" />

<x-dashboard.user_files :array="$user->files_user_cert_mediator" title="Спец. курс медиатора:" field="user_special_cert_mediator"   free="{{ count($user->files_user_special_cert_mediator) }}" />

<x-dashboard.user_files :array="$user->files_user_cert_mediator" title="Курс тренер медиатор:" field="user_mediator_trener"   free="{{ count($user->files_user_mediator_trener) }}" />
