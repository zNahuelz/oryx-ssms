import type { HttpContext } from '@adonisjs/core/http'
import { LoginValidator } from '#validators/login'
import User from '#models/user'

export default class AuthController {
  public async login({ request, response, auth }: HttpContext) {
    const { email, password } = await request.validateUsing(LoginValidator)

    const user = await User.verifyCredentials(email, password)
    const token = await auth.use('api').createToken(user)

    return response.ok({
      status: 'success',
      data: {
        user: user.serialize(),
        token: {
          type: token.type,
          token: token.value!.release(),
          expiresAt: token.expiresAt?.toISOString(),
        },
      },
    })
  }

  public async logout({ auth, response }: HttpContext) {
    await auth.use('api').invalidateToken()
    return response.ok({ status: 'success', message: 'Logged out!' })
  }
}
