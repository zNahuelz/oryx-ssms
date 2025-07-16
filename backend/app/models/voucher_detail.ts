import { DateTime } from 'luxon'
import { BaseModel, belongsTo, column } from '@adonisjs/lucid/orm'
import Voucher from './voucher.js'
import type { BelongsTo } from '@adonisjs/lucid/types/relations'

export default class VoucherDetail extends BaseModel {
  @column({ isPrimary: true })
  declare id: number

  @column()
  declare amount: number

  @column()
  declare unitPrice: number

  @column()
  declare subtotal: number

  @column.dateTime({ autoCreate: true })
  declare createdAt: DateTime

  @column.dateTime({ autoCreate: true, autoUpdate: true })
  declare updatedAt: DateTime

  @column.dateTime()
  declare deletedAt: DateTime | null

  @belongsTo(() => Voucher)
  declare voucher: BelongsTo<typeof Voucher>
}
