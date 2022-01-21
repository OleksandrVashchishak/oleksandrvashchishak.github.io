<div class="metamask__wallet-email">
    <span class="metamask__wallet-label">YOUR EMAIL:</span>
    <span class="metamask__wallet-value metamask__wallet-email">
        <input type="text" class="metamask__wallet-value-email" disabled value="<?php echo $_SESSION['email'] ? $_SESSION['email'] : '-'; ?>">
        <span class="metamask_edit_icon" onclick="getEditDateDb('email')">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 17.013L11.413 16.998L21.045 7.45799C21.423 7.07999 21.631 6.57799 21.631 6.04399C21.631 5.50999 21.423 5.00799 21.045 4.62999L19.459 3.04399C18.703 2.28799 17.384 2.29199 16.634 3.04099L7 12.583V17.013ZM18.045 4.45799L19.634 6.04099L18.037 7.62299L16.451 6.03799L18.045 4.45799ZM9 13.417L15.03 7.44399L16.616 9.02999L10.587 15.001L9 15.006V13.417Z" fill="url(#paint0_linear_1022_40)" />
                <path d="M5 21H19C20.103 21 21 20.103 21 19V10.332L19 12.332V19H8.158C8.132 19 8.105 19.01 8.079 19.01C8.046 19.01 8.013 19.001 7.979 19H5V5H11.847L13.847 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21Z" fill="url(#paint1_linear_1022_40)" />
                <defs>
                    <linearGradient id="paint0_linear_1022_40" x1="9.74717" y1="2.47812" x2="19.8844" y2="3.8157" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFC01F" />
                        <stop offset="1" stop-color="#FF7D1F" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_1022_40" x1="6.37975" y1="3" x2="18.854" y2="4.63513" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFC01F" />
                        <stop offset="1" stop-color="#FF7D1F" />
                    </linearGradient>
                </defs>
            </svg>
        </span>
        <button class="edit-btn-prifile-date edit-btn-prifile-date-change" onclick="getUpdateDateDb('email')">Save</button>
        <button class="edit-btn-prifile-date edit-btn-profile-close" onclick="closeUpdateDateDb('email', 'reject')">&#x2715;</button>
    </span>
    <span class="metamask__wallet-error metamask__wallet-error-email"></span>
</div>

<div class="metamask__wallet-username">
    <span class="metamask__wallet-label">PUBLIC NAME:</span>
    <span class="metamask__wallet-value  metamask__wallet-publicName">
        <input type="text" class="metamask__wallet-value-publicName" disabled value="<?php echo $_SESSION['publicName'] ? $_SESSION['publicName'] : '-'; ?>">
        <span class="metamask_edit_icon" onclick="getEditDateDb('publicName')">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 17.013L11.413 16.998L21.045 7.45799C21.423 7.07999 21.631 6.57799 21.631 6.04399C21.631 5.50999 21.423 5.00799 21.045 4.62999L19.459 3.04399C18.703 2.28799 17.384 2.29199 16.634 3.04099L7 12.583V17.013ZM18.045 4.45799L19.634 6.04099L18.037 7.62299L16.451 6.03799L18.045 4.45799ZM9 13.417L15.03 7.44399L16.616 9.02999L10.587 15.001L9 15.006V13.417Z" fill="url(#paint0_linear_1022_40)" />
                <path d="M5 21H19C20.103 21 21 20.103 21 19V10.332L19 12.332V19H8.158C8.132 19 8.105 19.01 8.079 19.01C8.046 19.01 8.013 19.001 7.979 19H5V5H11.847L13.847 3H5C3.897 3 3 3.897 3 5V19C3 20.103 3.897 21 5 21Z" fill="url(#paint1_linear_1022_40)" />
                <defs>
                    <linearGradient id="paint0_linear_1022_40" x1="9.74717" y1="2.47812" x2="19.8844" y2="3.8157" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFC01F" />
                        <stop offset="1" stop-color="#FF7D1F" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_1022_40" x1="6.37975" y1="3" x2="18.854" y2="4.63513" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFC01F" />
                        <stop offset="1" stop-color="#FF7D1F" />
                    </linearGradient>
                </defs>
            </svg>
        </span>
        <button class="edit-btn-prifile-date edit-btn-prifile-date-change" onclick="getUpdateDateDb('publicName')">Save</button>
        <button class="edit-btn-prifile-date edit-btn-profile-close" onclick="closeUpdateDateDb('publicName', 'reject')">&#x2715;</button>
    </span>
    <span class="metamask__wallet-error metamask__wallet-error-publicName"></span>
</div>




<style>
    .metamask__wallet-value {
        display: flex;
        align-items: center;
    }

    .edit-btn-prifile-date {
        display: none
    }

    .edit-btn-prifile-date.active {
        display: block
    }
</style>