<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <form action="/confirmation" method="get" name="contact-form" class="flex h-adr">
        <table>
            @csrf
            <tr>
                <th>
                    お名前
                    <span class="required">※</span>
                </th>
                <td>
                    <div class="name-container flex">
                        <input
                            type="text"
                            name="lastName"
                            wire:model="lastName"
                            required="required"
                            placeholder="山田"
                            value="{{ old('lastName') }}"
                        >
                        <input
                            type="text"
                            name="firstName"
                            wire:model="firstName"
                            required="required"
                            placeholder="太郎"
                            value="{{ old('firstName') }}"
                        >
                    </div>
                    <div class="error-container">
                        @error('lastName') <p class="error">{{ $message }}</p> @enderror
                        @error('firstName') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    性別
                    <span class="required">※</span>
                </th>
                <td>
                    <div class="gender-container flex">
                        <label class="gender-label">
                            <input
                                type="radio"
                                name="gender"
                                value=1
                                required="required"
                                class="gender-input"
                                checked
                            >
                            <span class="gender-text flex">男性</span>
                        </label>
                        <label class="gender-label">
                            <input
                                type="radio"
                                name="gender"
                                value=2
                                required="required"
                                class="gender-input"
                            >
                            <span class="gender-text flex">女性</span>
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    メールアドレス
                    <span class="required">※</span>
                </th>
                <td>
                    <input
                        type="email"
                        name="email"
                        wire:model="email"
                        required="required"
                        placeholder="test@example.com"
                        value="{{ old('email') }}"
                    >
                    <div class="error-container">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    郵便番号
                    <span class="required">※</span>
                </th>
                <td>
                    <div class="postcode-container flex">
                        <span class="p-country-name" style="display:none;">Japan</span>
                        <p>〒</p>
                        <input
                            type="text"
                            name="postcode"
                            wire:model.lazy="postcode"
                            required="required"
                            maxlength="8"
                            class="postcode-input p-postal-code"
                            placeholder="123-4567"
                            value="{{ old('postcode') }}"
                        >
                    </div>
                    <div class="error-container">
                        @error('postcode') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    住所
                    <span class="required">※</span>
                </th>
                <td>
                    <input
                        type="text"
                        name="address"
                        wire:model="address"
                        required="required"
                        class="p-region p-locality p-street-address p-extended-address "
                        placeholder="東京都渋谷区千駄ヶ谷1-2-3"
                        value="{{ old('address') }}"
                    >
                    <div class="error-container">
                        @error('address') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>
                    <input
                        type="text"
                        name="building"
                        placeholder="千駄ヶ谷マンション101"
                        value="{{ old('building') }}"
                    >
                </td>
            </tr>
            <tr>
                <th>
                    ご意見
                    <span class="required">※</span>
                </th>
                <td>
                    <textarea
                        name="opinion"
                        wire:model="opinion"
                        cols="24"
                        rows="5"
                        maxlength="120"
                        class=""
                        placeholder="120文字以内"
                    >{{ old('opinion') }}</textarea>
                    <div class="error-container">
                        @error('opinion') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </td>
            </tr>
        </table>
        <input type="submit" class="btn btn-confirm" value="確認">
      </form>
</div>
