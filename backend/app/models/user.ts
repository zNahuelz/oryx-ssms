import { DateTime } from 'luxon'
import hash from '@adonisjs/core/services/hash'
import { compose } from '@adonisjs/core/helpers'
import { BaseModel, belongsTo, column } from '@adonisjs/lucid/orm'
import { withAuthFinder } from '@adonisjs/auth/mixins/lucid'
import { DbAccessTokensProvider } from '@adonisjs/auth/access_tokens'
import Role from './role.js'
import type { BelongsTo } from '@adonisjs/lucid/types/relations'

const AuthFinder = withAuthFinder(() => hash.use('scrypt'), {
  uids: ['email'],
  passwordColumnName: 'password',
})

export default class User extends compose(BaseModel, AuthFinder) {
  @column({ isPrimary: true })
  declare id: number

  @column()
  declare names: string

  @column()
  declare surnames: string | null

  @column()
  declare dni: string

  @column()
  declare phoneNumber: string | null

  @column()
  declare address: string

  @column()
  declare email: string

  @column()
  declare position: string

  @column({ serializeAs: null })
  declare password: string

  @column()
  declare profilePicture: string

  @column({ columnName: 'role_id' })
  declare roleId: number

  @column.dateTime({ autoCreate: true })
  declare createdAt: DateTime

  @column.dateTime({ autoCreate: true, autoUpdate: true })
  declare updatedAt: DateTime | null

  @column.dateTime()
  declare deletedAt: DateTime | null

  @belongsTo(() => Role)
  declare role: BelongsTo<typeof Role>

  static accessTokens = DbAccessTokensProvider.forModel(User, {
    expiresIn: '15 days',
  })
}
