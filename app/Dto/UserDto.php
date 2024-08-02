<?php

namespace App\Dto;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Optional;
use illuminate\Support\Str;


class UserDto extends Data
{

    // we can use it as form request, api resource and dto
    public function __construct(

        // public null|int  $id, // while creating if we dont passit, it will have value null.
        public null|int|Optional  $id, // optional means it can be avoided while creating. mean if we dont pass it in the creation, its value will be null so with optional this null value can be removed from the result
        public ?string $name,
        public string|Optional $email,
        public null|string|Lazy $password,  // lazy mean if i ask you to return it from the dto then include it else dont
    ) {
    }

    // is ko create krty waqt , if you pass more data than defined above , it will not be in the result

    // after initialization this function , we can use this dto as formrequest in the controller
    // if i dont write this function then rules can infered form the data . like ?string mean nullable can be , string mean required string
    // even if id is required above like publi int $id and i dont write any rule it will be marked as required
    public static function rules($context): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8',],
        ];
    }
    // so we get all the method like form request has
    public static function prepareForPipeline(array $properties): array
    {
        // like preparer for validation
        return [...$properties, 'name' => 'nawa'];
    }

    public static function authorize(): bool
    {
        return !false;
    }

    // include conditons . like include these properties in the object return if
    public function includeProperties(): array
    {
        return [
            'email' => Str::length($this->email) > 110,
        ];
    }

    // ican override these methods like if i am creating a new dto form a string like UserDto::from("saf sf") what to do
    public static function fromString(string $string): self
    {
        [$title, $artist] = explode('|', $string);

        return new self(name: $title, email: $artist, id: null, password: null);
    }
    public static function fromRequest($request)
    {
        return new self(
            2,
            "asfsaf",
            "asfsf",
            Lazy::create(fn () => $request['password']),  // only include password to the return result when i ask you to include . like UserDto::from(User::first())->include('password');
            // Lazy::whenLoaded('songs', $album, fn() => SongData::collection($album->songs)), // load this property only when the relationship is loaded
        );
    }

    public function defaultWrap(): string
    {
        return 'data';
        // which key is to use while wrapping the data
        // it wil be like ['data'=>[]]
    }
}
