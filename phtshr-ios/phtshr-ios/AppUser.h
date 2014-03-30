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

@property (nonatomic, strong) NSString *lastName;
@property (nonatomic, strong) NSString *firstName;
@property (nonatomic, strong) NSString *email;
@property (nonatomic, strong) MyPhoto *profilePicture;
@property (nonatomic, strong) NSMutableArray *lstMyFavorites;
@property (nonatomic, strong) NSMutableArray *lstMyPictures;

@end
