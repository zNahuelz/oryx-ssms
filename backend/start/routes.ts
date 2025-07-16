/*
|--------------------------------------------------------------------------
| Routes file
|--------------------------------------------------------------------------
|
| The routes file is used for defining the HTTP routes.
|
*/

import AuthController from '#controllers/auth_controller'
import AuthMiddleware from '#middleware/auth_middleware'
import auth from '@adonisjs/auth/services/main'
import router from '@adonisjs/core/services/router'
import { middleware } from './kernel.js'

router.get('/', async () => {
  return {
    hello: 'world',
  }
})
router
  .group(() => {
    router
      .group(() => {
        router.post('/login', [AuthController, 'login'])
        router.post('/logout',[AuthController, 'logout']).use(middleware.auth())
      })
      .prefix('/auth')
  })
  .prefix('/api/v1')
