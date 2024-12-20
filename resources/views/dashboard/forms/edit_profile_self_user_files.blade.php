

<x-dashboard.user_files :array="$user->files_user_idcard" title="Удостоверение личности:" field="user_idcard"   free="{{ count($user->files_user_idcard) }}" />

<x-dashboard.user_files :array="$user->files_user_judge" title="Справка об отсуствии судимости:" field="user_judge"   free="{{ count($user->files_user_judge) }}" />

<x-dashboard.user_files :array="$user->files_user_crazy" title="Справка с псих диспансера:"  field="user_crazy" free="{{ count($user->files_user_crazy) }}" />

<x-dashboard.user_files :array="$user->files_user_diplom" title="Диплом о высшем образовании:" field="user_diplom" free="{{ count($user->files_user_diplom) }}" />

