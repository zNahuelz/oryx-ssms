import { DateTime } from 'luxon'
import { BaseModel, column, hasMany, manyToMany } from '@adonisjs/lucid/orm'
import Permission from './permission.js'
import type { HasMany, ManyToMany } from '@adonisjs/lucid/types/relations'
import User from './user.js'

export default class Role extends BaseModel {
  @column({ isPrimary: true })
  declare id: number

  @column()
  declare name: string

  @column.dateTime({ autoCreate: true })
  declare createdAt: DateTime

  @column.dateTime({ autoCreate: true, autoUpdate: true })
  declare updatedAt: DateTime

  @column.dateTime()
  declare deletedAt: DateTime | null

  @manyToMany(() => Permission, {
    pivotTable: 'permission_roles',
  })
  declare permissions: ManyToMany<typeof Permission>

  @hasMany(() => User)
  declare users: HasMany<typeof User>
}
