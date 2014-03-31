//
//  AppUser.h
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-28.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "MyPhoto.h"

@interface AppUser : NSObject

@property (nonatomic) NSInteger u_id;
@property (nonatomic, strong) NSString *lastName;
@property (nonatomic, strong) NSString *firstName;
@property (nonatomic, strong) NSString *email;
@property (nonatomic, strong) UIImage *profilePicture;
@property (nonatomic, strong) NSString *passwd;
@property (nonatomic, strong) NSString *salt;
@property (nonatomic, strong) NSMutableArray *lstMyFavorites;
@property (nonatomic, strong) NSMutableArray *lstMyPictures;

@end
