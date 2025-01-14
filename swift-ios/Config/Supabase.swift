//
//  Supabase.swift
//  woms
//
//  Created by Guillaume FINE on 23/11/2023.
//

import Foundation
import Supabase

let supabase = SupabaseClient(supabaseURL: URL(string: SUPABASE_API_URL)!, supabaseKey: SUPABASE_ANON_KEY)
