<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'stance', 'board', 'introduction', 'image_path', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spots()
    {
        return $this->hasMany('App\Spot');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * config/stance.phpの数字を文字に変換
     */

    public function getStanceLabelAttribute()
    {
        $stance_name = $this->attributes['stance'];

        return config('stance')[$stance_name]['label'];
    }

    /**
     * config/board.phpの数字を文字に変換
    */

    public function getBoardLabelAttribute()
    {
        $board_name = $this->attributes['board'];

        return config('board')[$board_name]['label'];
    }

    /**
     * @return mixed
     */
    public function getSpotName()
    {
        return $this->spots->name;
    }

    /**
     * @param $notification
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function routeNotificationForSlack($notification)
    {
        return config('webhook.slack');
    }

    /**
     * @param $request
     */
    public function userUpdateImage($request)
    {
        $form = $request->all();
        if (isset($form['image'])) {
            // 画像の拡張子を取得
            $extension = $form['image']->getClientOriginalExtension();
            // 画像の名前を取得
            $filename = $form['image']->getClientOriginalName();
            // 画像をリサイズ
            $resize_img = Image::make($form['image'])->resize(300, 300)->encode($extension);
            // s3のuploadsファイルに追加
            $path = Storage::disk('s3')->put('/user/' . $filename, (string)$resize_img, 'public');
            // 画像のURLを参照
            $url = Storage::disk('s3')->url('user/' . $filename);
            $this->image_path = $url;
        }

        if (isset($form['remove'])) {
            $this->image_path = null;
            unset($form['remove']);
        }

        unset($form['_token'], $form['image']);

        $this->fill($form)->save();
    }
}
