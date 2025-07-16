import { DateTime } from 'luxon'
import { BaseModel, column, hasMany } from '@adonisjs/lucid/orm'
import Voucher from './voucher.js'
import type { HasMany } from '@adonisjs/lucid/types/relations'

export default class VoucherType extends BaseModel {
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

  @hasMany(() => Voucher)
  declare vouchers: HasMany<typeof Voucher>
}
