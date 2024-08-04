<!DOCTYPE html>
<html>
<head>
    <title>Редактировать бренд</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Редактирование пользователя</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль (оставьте пустым, если не хотите менять)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <label for="profile_photo_path">Путь к фото профиля</label>
            <input type="text" name="profile_photo_path" class="form-control" value="{{ $user->profile_photo_path }}">
        </div>

        <div class="form-group">
            <label for="code_mentor_id">ID ментора</label>
            <input type="number" name="code_mentor_id" class="form-control" value="{{ $user->code_mentor_id }}">
        </div>

        <div class="form-group">
            <label for="user_role_id">Роль пользователя</label>
            <input type="number" name="user_role_id" class="form-control" value="{{ $user->user_role_id }}" required>
        </div>

        <div class="form-group">
            <label for="referral_code">Реферальный код</label>
            <input type="text" name="referral_code" class="form-control" value="{{ $user->referral_code }}">
        </div>

        <div class="form-group">
            <label for="money">Заработок</label>
            <input type="number" name="money" class="form-control" value="{{ $totalSalary ? $totalSalary->money : 0 }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div>
</body>
</html>
