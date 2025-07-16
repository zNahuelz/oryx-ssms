import vine from '@vinejs/vine'

export const LoginValidator = vine.compile(
    vine.object({
        email: vine.string().trim().email().maxLength(50),
        password: vine.string().minLength(5).maxLength(20)
    })
)